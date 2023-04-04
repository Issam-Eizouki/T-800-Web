package epitech.roadTrip.controller;

import java.util.Map;
import java.util.HashMap;

import javax.validation.Valid;

import java.security.SecureRandom;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import epitech.roadTrip.models.User;
import epitech.roadTrip.payload.request.GoogleRequest;
import epitech.roadTrip.payload.request.LoginRequest;
import epitech.roadTrip.payload.request.SignupRequest;
import epitech.roadTrip.payload.response.EmailResponse;
import epitech.roadTrip.payload.response.JwtResponse;
import epitech.roadTrip.security.jwt.JwtUtils;
import epitech.roadTrip.repository.RoleRepository;
import epitech.roadTrip.repository.UserRepository;
import epitech.roadTrip.security.services.UserDetailsImpl;

import org.springframework.web.bind.annotation.ResponseStatus;
import org.springframework.web.bind.annotation.ExceptionHandler;
import org.springframework.web.bind.MethodArgumentNotValidException;
import org.springframework.validation.FieldError;
import org.springframework.http.HttpStatus;

import epitech.roadTrip.models.Role;

@CrossOrigin(origins = "*", maxAge = 3600)
@RestController
@RequestMapping("/api")
public class AuthController {

    @Autowired
    AuthenticationManager authenticationManager;

    @Autowired
    UserRepository userRepository;

    @Autowired
    RoleRepository roleRepository;

    @Autowired
    public PasswordEncoder encoder;

    @Autowired
    JwtUtils jwtUtils;

    @PostMapping("/login")
    public ResponseEntity<?> authenticateUser(@Valid @RequestBody LoginRequest loginRequest) {

        if (!userRepository.existsByUsername(loginRequest.getEmail())) {
            return ResponseEntity
                    .badRequest()
                    .body(new EmailResponse("Email doesn't exist!"));
        }

        Authentication authentication = authenticationManager.authenticate(
                new UsernamePasswordAuthenticationToken(loginRequest.getEmail(), loginRequest.getPassword()));

        SecurityContextHolder.getContext().setAuthentication(authentication);
        String jwt = jwtUtils.generateJwtToken(authentication);

        UserDetailsImpl userDetails = (UserDetailsImpl) authentication.getPrincipal();

        return ResponseEntity.ok(new JwtResponse(jwt,
                userDetails.getUsername()
                ));
    }

    @PostMapping("/register")
    public ResponseEntity<?> registerUser(@Valid @RequestBody SignupRequest signUpRequest) {
        if (userRepository.existsByUsername(signUpRequest.getEmail())) {
            return ResponseEntity
                    .badRequest()
                    .body(new EmailResponse("Email already exist!"));
        }

        User user = new User(signUpRequest.getEmail(), encoder.encode(signUpRequest.getPassword()),
        signUpRequest.getEmail());

        Role role = roleRepository.findByName("user").get();
        user.getRoles().add(role);
        userRepository.save(user);
        

        Authentication authentication = authenticationManager.authenticate(
                new UsernamePasswordAuthenticationToken(user.getUsername(), signUpRequest.getPassword()));

        SecurityContextHolder.getContext().setAuthentication(authentication);
        String jwt = jwtUtils.generateJwtToken(authentication);

        UserDetailsImpl userDetails = (UserDetailsImpl) authentication.getPrincipal();

        return ResponseEntity.ok(new JwtResponse(jwt,
        userDetails.getUsername()
        ));
    }

    @PostMapping("/login/google")
    public ResponseEntity<?> authenticateUserGoogle(@Valid @RequestBody GoogleRequest googleRequest) {

        String mdpAleatoire = mdpAlea(8);

        if (!userRepository.existsByEmail(googleRequest.getEmail())) {  
            User user = new User(googleRequest.getEmail(), encoder.encode(mdpAleatoire),
             googleRequest.getEmail());
            user.setGoogle_id(googleRequest.getGoogle_id());
            userRepository.save(user);
        } else {
            User user = userRepository.findByUsername(googleRequest.getEmail()).get();
            try {
                if (!user.getGoogle_id().equals(googleRequest.getGoogle_id())) {
                    user.setGoogle_id(googleRequest.getGoogle_id());
                    userRepository.save(user);                   
                }
            } catch(Exception e) {
                user.setGoogle_id(googleRequest.getGoogle_id());
                userRepository.save(user);
            }
        }

        User user = userRepository.findByUsername(googleRequest.getEmail()).get();
        user.setPassword(encoder.encode(mdpAleatoire));
        Role role = roleRepository.findByName("user").get();
        if (!user.getRoles().contains(role)) {
            user.getRoles().add(role);
        }
        userRepository.save(user);

        Authentication authentication = authenticationManager.authenticate(
            new UsernamePasswordAuthenticationToken(user.getUsername(), mdpAleatoire));

        SecurityContextHolder.getContext().setAuthentication(authentication);
        String jwt = jwtUtils.generateJwtToken(authentication);

        UserDetailsImpl userDetails = (UserDetailsImpl) authentication.getPrincipal();

        return ResponseEntity.ok(new JwtResponse(jwt,
                userDetails.getEmail()
                ));
    }

    @ResponseStatus(HttpStatus.BAD_REQUEST)
    @ExceptionHandler(MethodArgumentNotValidException.class)
    public Map<String, String> handleValidationExceptions(
            MethodArgumentNotValidException ex) {
        Map<String, String> errors = new HashMap<>();
        ex.getBindingResult().getAllErrors().forEach((error) -> {
            String fieldName = ((FieldError) error).getField();
            String errorMessage = error.getDefaultMessage();
            errors.put(fieldName, errorMessage);
        });
        return errors;
    }

    public String mdpAlea(int longueur) {
        String caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?";
        SecureRandom random = new SecureRandom();
        StringBuilder sb = new StringBuilder(longueur);
        for (int i = 0; i < longueur; i++) {
            int index = random.nextInt(caracteres.length());
            sb.append(caracteres.charAt(index));
        }
        return encoder.encode(sb.toString());
    }
}

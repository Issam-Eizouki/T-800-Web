package epitech.roadTrip.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

// import javax.validation.Valid;
import java.util.Optional;
import javax.validation.Valid;

import epitech.roadTrip.models.InMemory;
import epitech.roadTrip.models.Role;
import epitech.roadTrip.models.User;
import epitech.roadTrip.service.UserService;
import epitech.roadTrip.payload.request.AddUserRequest;
import epitech.roadTrip.payload.request.ChangePassJwtRequest;
import epitech.roadTrip.payload.request.ChangePassRequest;
import epitech.roadTrip.payload.request.ResetToken;
import epitech.roadTrip.payload.response.EmailResponse;
import epitech.roadTrip.payload.response.MessageResponse;
import epitech.roadTrip.payload.response.PasswordResponse;
import epitech.roadTrip.payload.response.RoleResponse;
import epitech.roadTrip.payload.response.TokenResponse;
import epitech.roadTrip.payload.response.UserResponse;
import epitech.roadTrip.repository.InMemoryRepository;
import epitech.roadTrip.repository.RoleRepository;
import epitech.roadTrip.repository.UserRepository;
import epitech.roadTrip.security.jwt.JwtUtils;

import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;

@RestController
@RequestMapping("/api")
public class UserController {

    @Autowired
    private UserService userService;

    @Autowired
    RoleRepository roleRepository;

    @Autowired
    UserRepository userRepository;

    @Autowired
    InMemoryRepository inMemoryRepository;

    @Autowired
    public PasswordEncoder encoder;

    @Autowired
    JwtUtils jwtUtils;

    /**
    * Read - Get all User
    * @return - An Iterable object of User full filled
    */
     @GetMapping("/users")
     public Iterable<User> getUsers() {
        return userService.getUsers();
    }

    @GetMapping("/user/{id}")
    public Optional<User> getUser(@PathVariable(value = "id") Long UserId) {
        return userService.getUser(UserId);
    }

    @GetMapping("/username/{username}")
    public Optional<User> getUserByUsername(@PathVariable(value = "username") String username) {
        return userRepository.findByUsername(username);
    }

    @DeleteMapping("/users/{id}")
    public String deleteUser(@PathVariable(value = "id") Long UserId) {
        return userService.deleteUser(UserId);
    }

    @PutMapping("user/addRole")
    public ResponseEntity<?> addRole(@Valid @RequestBody AddUserRequest addUserRequest) {
        if (!roleRepository.existsByName(addUserRequest.getRole())) {
            return ResponseEntity
                    .badRequest()
                    .body(new RoleResponse("Role doesn't exist!"));
        }
        Role role = roleRepository.findByName(addUserRequest.getRole()).get();

        if (!userRepository.existsByEmail(addUserRequest.getEmail())) {
            return ResponseEntity
                    .badRequest()
                    .body(new EmailResponse("Email doesn't exist!"));
        }
        User user = userRepository.findByEmail(addUserRequest.getEmail()).get();

        if (user.getRoles().contains(role)) {
            return ResponseEntity
                    .badRequest()
                    .body(new UserResponse("The role is already linked to the user"));
        }

        user.getRoles().add(role);
        userRepository.save(user);
            
        return ResponseEntity.ok(new MessageResponse("Role added to user"));
    }

    @PutMapping("password")
    public ResponseEntity<?> changePassword(@Valid @RequestBody ChangePassRequest changePassRequest) {
        Authentication authentication = SecurityContextHolder.getContext().getAuthentication();
        String username = authentication.getName();

        if (authentication.isAuthenticated()) {

            if (!changePassRequest.getNew_password().equals(changePassRequest.getConfirm_password())) {
                return ResponseEntity
                    .badRequest()
                    .body(new PasswordResponse("The passwords do not match."));
            }

            if (!userService.checkPassword(username, changePassRequest.getCurrent_password())) {
                return ResponseEntity
                    .badRequest()
                    .body(new PasswordResponse("Invalid current password."));
            }

            userService.updatePassword(username, changePassRequest.getNew_password());

            Authentication newAuthentication = new UsernamePasswordAuthenticationToken(authentication.getPrincipal(),
            changePassRequest.getNew_password(), authentication.getAuthorities());
            SecurityContextHolder.getContext().setAuthentication(newAuthentication);

            return ResponseEntity.ok(new MessageResponse("Password changed."));
        }

        return ResponseEntity
                    .badRequest()
                    .body(new UserResponse("User not authentified."));
    }

    @PostMapping("/password/forgot")
    public ResponseEntity<?> createTokenPassword(@RequestBody ResetToken resetToken) {
        
        if (!userRepository.existsByEmail(resetToken.getEmail())) {
            return ResponseEntity
                    .badRequest()
                    .body(new EmailResponse("Invalid"));
        }

        User user = userService.getUserByUsername(resetToken.getEmail());

        // Générer un nouveau token JWT
        String jwt = jwtUtils.generateJwtTokenChangePass(user.getUsername());

        // Enregistrer le nouveau token en mémoire
        if (!inMemoryRepository.existsByEmail(user.getEmail())) {
            InMemory inMemory = new InMemory(user.getEmail(), jwt);
            inMemoryRepository.save(inMemory);
        } else {
            InMemory inMemory = inMemoryRepository.findByEmail(user.getEmail());
            inMemory.setToken(jwt);
            inMemoryRepository.save(inMemory);
        }

        return ResponseEntity.ok(new TokenResponse(jwt));
    }

    @GetMapping("/password/reset")
    public ResponseEntity<?> getEmailFromToken(@RequestParam("token") String tokenValue) {

        if (inMemoryRepository.existsByToken(tokenValue)) {
            InMemory inMemory = inMemoryRepository.findByToken(tokenValue);
            return ResponseEntity.ok(new EmailResponse(inMemory.getEmail()));
        }
        return ResponseEntity
                .badRequest()
                .body(new TokenResponse("Token invalid"));
    
    }

    @PutMapping("/password/reset")
    public ResponseEntity<?> changePasswordByToken(@Valid @RequestBody ChangePassJwtRequest changePassJwtRequest) {

        if (!userRepository.existsByEmail(changePassJwtRequest.getEmail())) {
            return ResponseEntity
                .badRequest()
                .body(new EmailResponse("Email doesn't exist"));
        }

        if (!inMemoryRepository.existsByToken(changePassJwtRequest.getToken())) {
            return ResponseEntity
                .badRequest()
                .body(new TokenResponse("Token invalid"));
        }

        InMemory inMemory = inMemoryRepository.findByToken(changePassJwtRequest.getToken());
        if (!changePassJwtRequest.getEmail().equals(inMemory.getEmail())) {
            return ResponseEntity
                .badRequest()
                .body(new TokenResponse("Token invalid for this email"));
        }

        if (changePassJwtRequest.getPasword().length()<6) {
            return ResponseEntity
                .badRequest()
                .body(new PasswordResponse("Password must be minimum 6 characters"));
        }
        
        User user = userService.getUserByEmail(inMemory.getEmail());
        userService.updatePassword(user.getUsername(), changePassJwtRequest.getPasword());

        inMemoryRepository.delete(inMemory);

        return ResponseEntity.ok(new MessageResponse("Password changed."));
    }
    
}
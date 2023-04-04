package epitech.roadTrip.service;

import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;

import epitech.roadTrip.models.User;
import epitech.roadTrip.repository.UserRepository;
import epitech.roadTrip.repository.RoleRepository;

import lombok.Data;

@Data
@Service
public class UserService {

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private RoleRepository roleRepository;

    @Autowired
    public PasswordEncoder encoder;

    public Optional<User> getUser(final Long id) {
        return userRepository.findById(id);
    }

    public Iterable<User> getUsers() {
        return userRepository.findAll();
    }

    public String deleteUser(final Long id) {
        userRepository.deleteById(id);
        var msg = "User delete";
        return msg;
    }

    public User saveUser(User user) {
        return userRepository.save(user);
    }

    public User getUserByUsername(String username) {
        Optional<User> optUser = userRepository.findByUsername(username);
        User user = optUser.get();
        return user;
    }

    public User getUserByEmail(String email) {
        Optional<User> optUser = userRepository.findByEmail(email);
        User user = optUser.get();
        return user;
    }

    public boolean checkPassword(String username, String password) {
        Optional<User> userOpt = userRepository.findByUsername(username);
        User user = userOpt.get();
        if (user == null) {
            throw new UsernameNotFoundException("User not found.");
        }
        return encoder.matches(password, user.getPassword());
    }

    public void updatePassword(String username, String newPassword) {
        Optional<User> userOpt = userRepository.findByUsername(username);
        User user = userOpt.get();
        if (user == null) {
            throw new UsernameNotFoundException("User not found.");
        }
        user.setPassword(encoder.encode(newPassword));
        userRepository.save(user);
    }

}

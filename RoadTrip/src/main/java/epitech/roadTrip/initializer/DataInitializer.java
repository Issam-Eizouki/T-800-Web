package epitech.roadTrip.initializer;

import javax.transaction.Transactional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.CommandLineRunner;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Component;

import epitech.roadTrip.models.Pickup;
import epitech.roadTrip.models.Role;
import epitech.roadTrip.models.User;
import epitech.roadTrip.repository.PickupRepository;
import epitech.roadTrip.repository.RoleRepository;
import epitech.roadTrip.repository.UserRepository;

@Component
public class DataInitializer implements CommandLineRunner {

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private PickupRepository pickupRepository;

    @Autowired
    private RoleRepository roleRepository;

    @Autowired
    public PasswordEncoder encoder;
    
    @Override
    @Transactional
    public void run(String... args) throws Exception {

        try {
            if (!roleRepository.existsByName("user")) {
                Role roleUser = new Role("user");
                roleRepository.save(roleUser);
            }

            if (!roleRepository.existsByName("admin")) {
                Role roleUser = new Role("admin");
                roleRepository.save(roleUser);
            }

            if (!userRepository.existsByUsername("admin@citytours.com")) {
                User user = new User("admin@citytours.com", encoder.encode("admin"),
                "admin@citytours.com");
                Role role = roleRepository.findByName("admin").get();
                user.getRoles().add(role);
                userRepository.save(user);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        try {
            if (!pickupRepository.existsByName("Charles de Gaulle, Paris")) {
                Pickup pickup = new Pickup("Charles de Gaulle, Paris");
                pickupRepository.save(pickup);
            }

            if (!pickupRepository.existsByName("Aéroport de Bâle-Mulhouse")) {
                Pickup pickup = new Pickup("Aéroport de Bâle-Mulhouse");
                pickupRepository.save(pickup);
            }

            if (!pickupRepository.existsByName("Aéroport De Bordeaux Mérignac")) {
                Pickup pickup = new Pickup("Aéroport De Bordeaux Mérignac");
                pickupRepository.save(pickup);
            }

        } catch (Exception e) {
            e.printStackTrace();
        }

    }
}

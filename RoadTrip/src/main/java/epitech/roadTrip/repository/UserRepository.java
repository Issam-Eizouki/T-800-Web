package epitech.roadTrip.repository;

import java.util.Optional;
import org.springframework.data.jpa.repository.JpaRepository;

import epitech.roadTrip.models.Role;
import epitech.roadTrip.models.User;

public interface UserRepository extends JpaRepository<User, Long> {
    Optional<User> findByUsername(String username);
    Optional<User> findByEmail(String email);
    Boolean existsByUsername(String username);
    Boolean existsByEmail(String email);
    boolean existsByEmailAndRolesContaining(String email, Role role);
}
package epitech.roadTrip.repository;

import java.util.Optional;
import org.springframework.data.jpa.repository.JpaRepository;

import epitech.roadTrip.models.Role;

public interface RoleRepository extends JpaRepository<Role, Long> {
    Optional<Role> findByName(String name);
    Boolean existsByName(String name);
}

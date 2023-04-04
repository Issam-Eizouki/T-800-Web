package epitech.roadTrip.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import epitech.roadTrip.models.Pickup;

public interface PickupRepository extends JpaRepository<Pickup, Long> {
    Boolean existsByName(String name);
}
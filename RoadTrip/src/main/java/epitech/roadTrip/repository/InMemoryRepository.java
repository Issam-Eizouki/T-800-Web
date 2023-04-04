package epitech.roadTrip.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import epitech.roadTrip.models.InMemory;

public interface InMemoryRepository extends JpaRepository<InMemory, Long> {
    InMemory findByEmail(String email);
    Boolean existsByToken(String token);
    InMemory findByToken(String token);
    Boolean existsByEmail(String email);
}
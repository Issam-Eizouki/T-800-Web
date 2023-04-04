package epitech.roadTrip.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import epitech.roadTrip.models.Transaction;
import epitech.roadTrip.models.User;

public interface TransactionRepository extends JpaRepository<Transaction, Long> {
    Iterable<Transaction> findByUser(User user);
}
package epitech.roadTrip.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import epitech.roadTrip.models.Pickup;
import epitech.roadTrip.models.Transaction;
import epitech.roadTrip.models.User;
import epitech.roadTrip.payload.request.TransactionRequest;
import epitech.roadTrip.repository.PickupRepository;
import epitech.roadTrip.repository.TransactionRepository;
import epitech.roadTrip.repository.UserRepository;

@RestController
@RequestMapping("/api")
public class TransactionController {

    @Autowired
    private TransactionRepository transactionRepository;

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private PickupRepository pickupRepository;

    @GetMapping("/transactions")
    public Iterable<Transaction> getTransactions() {
        Authentication authentication = SecurityContextHolder.getContext().getAuthentication();
        String username = authentication.getName();
        User user = userRepository.findByUsername(username).get();
        return transactionRepository.findByUser(user);
    }

    @PostMapping("/transaction")
    public Transaction addTransaction(@RequestBody TransactionRequest transactionRequest) {
            Authentication authentication = SecurityContextHolder.getContext().getAuthentication();
            String username = authentication.getName();
            User user = userRepository.findByUsername(username).get();

            if (!pickupRepository.existsById(transactionRequest.getPickup_id())) {
                return null;  
            }
            Pickup pickup = pickupRepository.findById(transactionRequest.getPickup_id()).get();
            
            Transaction transaction = new Transaction(transactionRequest.getTransaction_id(),
            user, transactionRequest.getDatetime(), pickup, transactionRequest.getAdults(),
            transactionRequest.getChildren(), transactionRequest.getCost()); 
            transactionRepository.save(transaction);
        return transaction;
    }
    
}

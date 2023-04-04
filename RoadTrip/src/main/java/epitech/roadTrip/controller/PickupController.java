package epitech.roadTrip.controller;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import epitech.roadTrip.models.Pickup;
import epitech.roadTrip.repository.PickupRepository;

@RestController
@RequestMapping("/api")
public class PickupController {

    @Autowired
    private PickupRepository pickupRepository;

    @GetMapping("/airports")
    public List<Map<String, Object>> getPickups() {
        List<Pickup> pickups = pickupRepository.findAll();
        List<Map<String, Object>> pickupList = new ArrayList<>();
        for (Pickup pickup : pickups) {
            Map<String, Object> pickupMap = new HashMap<>();
            pickupMap.put("id", pickup.getId());
            pickupMap.put("name", pickup.getName());
            pickupList.add(pickupMap);
        }
        return pickupList;
    }
    
}

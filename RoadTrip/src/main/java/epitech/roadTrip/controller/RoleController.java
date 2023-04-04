package epitech.roadTrip.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;

// import javax.validation.Valid;
import java.util.Optional;

import epitech.roadTrip.models.Role;
import epitech.roadTrip.service.RoleService;

@RestController
@RequestMapping("/api")
public class RoleController {

    @Autowired
    private RoleService roleService;

    @GetMapping("/roles")
    public Iterable<Role> getRoles() {
        return roleService.getRoles();
    }

    @GetMapping("/role/{id}")
    public Optional<Role> getRole(@PathVariable(value = "id") Long RoleId) {
        return roleService.getRole(RoleId);
    }

}


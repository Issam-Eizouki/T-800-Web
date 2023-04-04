package epitech.roadTrip.service;

import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import epitech.roadTrip.models.Role;
import epitech.roadTrip.repository.RoleRepository;
import lombok.Data;

@Data
@Service
public class RoleService {

    @Autowired
    private RoleRepository roleRepository;

    public Optional<Role> getRole(final Long id) {
        return roleRepository.findById(id);
    }

    public Iterable<Role> getRoles() {
        return roleRepository.findAll();
    }

    public String deleteRole(final Long id) {
        roleRepository.deleteById(id);
        var msg = "Role delete";
        return msg;
    }

    public Role saveRole(Role role) {
        return roleRepository.save(role);
    }
    
    public Optional<Role> getRoleByName(String name) {
        return roleRepository.findByName(name);
    }

}

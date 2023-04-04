package epitech.roadTrip.payload.response;

public class RoleResponse {
    private String role;

	public RoleResponse(String role) {
	    this.role = role;
	  }

	public String getRole() {
		return role;
	}

	public void setRole(String role) {
		this.role = role;
	}
}
package epitech.roadTrip.payload.request;

import javax.validation.constraints.NotBlank;

public class AddUserRequest {
	@NotBlank
	private String email;

	@NotBlank
	private String role;

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getRole() {
		return role;
	}

	public void setRole(String role) {
		this.role = role;
	}
}
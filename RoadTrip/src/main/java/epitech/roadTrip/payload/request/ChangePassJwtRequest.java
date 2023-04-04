package epitech.roadTrip.payload.request;

import javax.validation.constraints.NotBlank;

public class ChangePassJwtRequest {
    @NotBlank
	private String email;

	@NotBlank
	private String password;

    @NotBlank
	private String token;

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getPasword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

    public String getToken() {
		return token;
	}

	public void setToken(String token) {
		this.token = token;
	}
}

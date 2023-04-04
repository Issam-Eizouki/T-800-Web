package epitech.roadTrip.payload.response;

public class JwtResponse {
	private String token;
	// private String username;
	private String email;

	public JwtResponse(String accessToken, String email) {
		this.token = accessToken;
		this.email = email;
	}

	public String getAccessToken() {
		return token;
	}

	public void setAccessToken(String accessToken) {
		this.token = accessToken;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	// public String getUsername() {
	// 	return username;
	// }

	// public void setUsername(String username) {
	// 	this.username = username;
	// }

}
package epitech.roadTrip.payload.response;

public class PasswordResponse {
    private String password;

	public PasswordResponse(String password) {
	    this.password = password;
	  }

	public String getPassword() {
		return password;
    }

	public void setPassword(String password) {
		this.password = password;
	}
}

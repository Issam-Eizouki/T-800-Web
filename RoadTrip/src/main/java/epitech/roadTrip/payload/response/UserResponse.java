package epitech.roadTrip.payload.response;

public class UserResponse {
    private String user;

	public UserResponse(String user) {
	    this.user = user;
	  }

	public String getUser() {
		return user;
	}

	public void setUSer(String user) {
		this.user = user;
	}
}
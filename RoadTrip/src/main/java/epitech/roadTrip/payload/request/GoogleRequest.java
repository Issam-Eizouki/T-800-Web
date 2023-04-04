package epitech.roadTrip.payload.request;

import javax.validation.constraints.NotBlank;

public class GoogleRequest {
	@NotBlank
	private String email;

	@NotBlank
	private String google_id;

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getGoogle_id() {
		return google_id;
	}

	public void setGoogle_id(String google_id) {
		this.google_id = google_id;
	}
}

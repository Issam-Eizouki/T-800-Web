package epitech.roadTrip.payload.request;

import javax.validation.constraints.NotBlank;

public class ChangePassRequest {
    @NotBlank
	private String current_password;

	@NotBlank
	private String new_password;

    @NotBlank
	private String confirm_password;

	public String getCurrent_password() {
		return current_password;
	}

	public void setCurrent_password(String current_password) {
		this.current_password = current_password;
	}

	public String getNew_password() {
		return new_password;
	}

	public void setNew_password(String new_password) {
		this.new_password = new_password;
	}

    public String getConfirm_password() {
		return confirm_password;
	}

	public void setConfirm_password(String confirm_password) {
		this.confirm_password = confirm_password;
	}
}

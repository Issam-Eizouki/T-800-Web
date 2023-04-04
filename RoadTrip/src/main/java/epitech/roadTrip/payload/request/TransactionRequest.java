package epitech.roadTrip.payload.request;

import javax.validation.constraints.NotBlank;

public class TransactionRequest {
	@NotBlank
    private String transaction_id;
    @NotBlank
    private Long pickup_id;
    @NotBlank
    private String datetime;
    @NotBlank
    private Long user_id;
    private String adults;
    private String children;
    @NotBlank
    private String cost;

	public String getTransaction_id() {
		return transaction_id;
	}

	public void setTransaction_id(String transaction_id) {
		this.transaction_id = transaction_id;
	}

	public Long getUser_id() {
        return pickup_id;
    }

    public void setUser_id(Long pickup_id) {
        this.pickup_id = pickup_id;
    }

    public Long getPickup_id() {
        return user_id;
    }

    public void setPickup_id(Long user_id) {
        this.user_id = user_id;
    }

    public String getAdults() {
        return adults;
    }

    public void setAdults(String adults) {
        this.adults = adults;
    }

    public String getChildren() {
        return children;
    }

    public void setChildren(String children) {
        this.children = children;
    }

    public String getCost() {
        return cost;
    }

    public void setCost(String cost) {
        this.cost = cost;
    }

    public String getDatetime() {
        return datetime;
    }

    public void setDatetime(String datetime) {
        this.datetime = datetime;
    }

}
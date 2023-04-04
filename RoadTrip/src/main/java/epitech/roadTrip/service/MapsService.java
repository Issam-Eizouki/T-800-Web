package epitech.roadTrip.service;

import okhttp3.HttpUrl;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;
import org.json.*;
import java.io.IOException;

public class MapsService {
    public static String BasicCall(String city, String Type) {
        OkHttpClient client = new OkHttpClient();
    
        HttpUrl httpUrltmp = HttpUrl.parse("https://maps.googleapis.com/maps/api/place/textsearch/json?");

        HttpUrl httpUrl = new HttpUrl.Builder()
        .scheme(httpUrltmp.scheme())
        .host(httpUrltmp.host())
        .addPathSegment(httpUrltmp.pathSegments().get(0))
        .addPathSegment(httpUrltmp.pathSegments().get(1))
        .addPathSegment(httpUrltmp.pathSegments().get(2))
        .addPathSegment(httpUrltmp.pathSegments().get(3))
        .addPathSegment(httpUrltmp.pathSegments().get(4))
        .addQueryParameter("query", Type + ", " + city)
        .addQueryParameter("key", "AIzaSyDfMwOBPEIOaVdpQ3g_EPAEZnLkbxrCPCU")
        .addQueryParameter("type", Type)
        .addQueryParameter("radius", "3000")
    .build();
        
    

    Request request = new Request.Builder().url(httpUrl).get().build();
    try {
        Response response = client.newCall(request).execute();
        return response.body().string();
    } catch (IOException e) {
        // TODO Auto-generated catch block
        e.printStackTrace();
        return "place api call failed my friends";
    }
    
    }

    public static String TravelCall(String destination, String origin) {
        OkHttpClient client = new OkHttpClient();
    
        HttpUrl httpUrltmp = HttpUrl.parse("https://maps.googleapis.com/maps/api/directions/json?");

        HttpUrl httpUrl = new HttpUrl.Builder()
        .scheme(httpUrltmp.scheme())
        .host(httpUrltmp.host())
        .addPathSegment(httpUrltmp.pathSegments().get(0))
        .addPathSegment(httpUrltmp.pathSegments().get(1))
        .addPathSegment(httpUrltmp.pathSegments().get(2))
        .addPathSegment(httpUrltmp.pathSegments().get(3))
        .addQueryParameter("destination", destination)
        .addQueryParameter("origin", origin)
        .addQueryParameter("key", "AIzaSyDfMwOBPEIOaVdpQ3g_EPAEZnLkbxrCPCU")
        .addQueryParameter("travel_mode", "transit")
    .build();
        
    

    Request request = new Request.Builder().url(httpUrl).get().build();
    try {
        Response response = client.newCall(request).execute();
        return response.body().string();
    } catch (IOException e) {
        // TODO Auto-generated catch block
        e.printStackTrace();
        return "place api call failed my friends";
    }
    
    }

    public static String FinalResult(JSONArray data ,int limit, int offset) {
        if (limit > data.length()) {
            limit = data.length();
        }
        if (limit + offset > data.length()) {
            offset = data.length() - limit;
        }
        JSONArray results = new JSONArray();
        for (int i = offset; i < offset + limit; i++) {
            results.put(data.getJSONObject(i));   
        }
        return results.toString();
    }

    public static JSONArray defaultParsing(JSONArray results) {

        // tu peut me prendre result et ne me garder que les element de l'offset a l'offset + limit
        // tu peut aussi me garder que les element de l'offset a l'offset + limit
        // tu peut aussi me garder que les element de l'offset a l'offset + limit
      
        
        for (int i = 0; i < results.length(); i++) {
            // enelever le camps viewport
            JSONObject result = results.getJSONObject(i).getJSONObject("geometry");
            result.remove("viewport");

            // remove orther fields
            results.getJSONObject(i).remove("reference");
            results.getJSONObject(i).remove("icon_background_color");
            results.getJSONObject(i).remove("icon_mask_base_uri");
            results.getJSONObject(i).remove("plus_code");
            results.getJSONObject(i).remove("photos");
            results.getJSONObject(i).append("photos", "");
        }
        



        return results;
    }
}

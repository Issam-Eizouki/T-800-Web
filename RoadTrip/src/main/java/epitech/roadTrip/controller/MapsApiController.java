package epitech.roadTrip.controller;

import org.springframework.web.bind.annotation.RestController;

import epitech.roadTrip.service.MapsService;
import epitech.roadTrip.service.MongoDBService;
import org.json.*;
import java.util.List;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

@RestController
@RequestMapping("/api")
public class MapsApiController {

    // limit, nombre de rez
    // offset: debut
    @GetMapping("/eat")
    public String eat(@RequestParam(required=true) String city, @RequestParam(required=false,defaultValue="3") int limit, @RequestParam(required=false,defaultValue="0") int offset) 
    {
        MongoDBService MongoService = new MongoDBService();
        JSONArray rez = null;
        String tmp = MongoService.GetDefaultData(city + "-restaurants");

        if (tmp  != "ko") {
            
            rez = new JSONArray(tmp); 
        } else {
            
             tmp = MapsService.BasicCall(city, "restaurants");
             JSONObject objJson = new JSONObject(tmp); 
            JSONArray resultsData = objJson.getJSONArray("results");
             rez = MapsService.defaultParsing(resultsData);
            // MongoService.SetDefaultData(rez, city, "restaurants");
        }
         
        return MapsService.FinalResult(rez, limit, offset);
        // return "jsj";
    
    
    }

    // @PutMapping("/eat")
    // public String puteat(@RequestParam(required=true) String id, @RequestBody String UpdateValue)
    // {

    //     return UpdateValue;
    // }

    @GetMapping("/drink")
    public String drink(@RequestParam(required=true) String city, @RequestParam(required=false,defaultValue="3") int limit, @RequestParam(required=false,defaultValue="0") int offset) 
    {
        MongoDBService MongoService = new MongoDBService();
        JSONArray rez = null;
        String tmp = MongoService.GetDefaultData(city + "-bar");
        
        // != ko
        if (tmp  != "ko") {
            rez = new JSONArray(tmp); 
        } else {
            
             tmp = MapsService.BasicCall(city, "bar");
             JSONObject objJson = new JSONObject(tmp); 
            JSONArray resultsData = objJson.getJSONArray("results");
             rez = MapsService.defaultParsing(resultsData);
            MongoService.SetDefaultData(rez, city, "bar");
        }
         
        return MapsService.FinalResult(rez, limit, offset);
        // return "jsj";
    
    
    }

    @GetMapping("/sleep")
    public String sleep(@RequestParam(required=true) String city, @RequestParam(required=false,defaultValue="3") int limit, @RequestParam(required=false,defaultValue="0") int offset)
     {
        MongoDBService MongoService = new MongoDBService();
        JSONArray rez = null;
        String tmp = MongoService.GetDefaultData(city + "-hotel");
        
        if (tmp != "ko") {
            
            rez = new JSONArray(tmp); 
        } else {
            
             tmp = MapsService.BasicCall(city, "hotel");
             JSONObject objJson = new JSONObject(tmp); 
            JSONArray resultsData = objJson.getJSONArray("results");
             rez = MapsService.defaultParsing(resultsData);
            MongoService.SetDefaultData(rez, city, "hotel");
        }
        return MapsService.FinalResult(rez, limit, offset);
    }

    @GetMapping("/cities")
    public List<String> cities()
     {
        MongoDBService MongoService = new MongoDBService();
        return MongoService.getCities();
    }

    @GetMapping("/eat/{id}")
    public String eatGetbyID(@PathVariable(value = "id") String placeId)
     {
        MongoDBService MongoService = new MongoDBService();
        return MongoService.getObjectDetails(placeId);
    }

    


    @GetMapping("/travel")
    public String travel(@RequestParam(required=true) String destination, @RequestParam(required=true) String origin)
     {
        JSONObject JsonRequest = new JSONObject();

        JSONObject jsonDest = new JSONObject();
        jsonDest.put("query", "Strasbourg");
        JsonRequest.put("destination", destination);
        
        // Add the origin object to the request object
        JSONObject JsonOrigin = new JSONObject();
        JsonOrigin.put("query", "Paris");
        JsonRequest.put("origin", origin);
        
        // Add the travelMode string to the request object
        JsonRequest.put("travelMode", "DRIVING");
        var rez = MapsService.TravelCall(destination, origin);
        JSONObject rezObjJson = new JSONObject(rez);

        rezObjJson.put("request", JsonRequest);
        return rezObjJson.toString();
    }
}

package epitech.roadTrip.service;

import java.util.ArrayList;
import java.util.List;

import org.bson.Document;
import org.json.JSONArray;
import org.json.JSONObject;

import com.mongodb.client.MongoDatabase;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.model.Filters;
import com.mongodb.client.model.Updates;

import com.mongodb.ConnectionString;
import com.mongodb.MongoClientSettings;
import com.mongodb.client.MongoClient;
import com.mongodb.client.MongoClients;
import com.mongodb.client.MongoCursor;

public class MongoDBService {


    MongoDatabase _database = connectToMongo();

    public MongoDatabase connectToMongo() {
        ConnectionString connectionString = new ConnectionString("mongodb+srv://Admin:UEejJdT1CYEFOgAC@atlascluster.ppx2bup.mongodb.net/?retryWrites=true&w=majority");
        MongoClientSettings settings = MongoClientSettings.builder()
                .applyConnectionString(connectionString)
                .build();
        MongoClient mongoClient = MongoClients.create(settings);
        MongoDatabase database = mongoClient.getDatabase("CityTour");
        return database;
    }

    public String SetDefaultData(JSONArray Data, String city, String type)
    {
        JSONObject objTmp = new JSONObject();
        objTmp.put("Data", Data);

        MongoCollection<Document> collection = _database.getCollection("MapsData", Document.class);
        Document bsonDoc = Document.parse(objTmp.toString());
        bsonDoc.put("_id", city + "-" + type);
        collection.insertOne(bsonDoc);

        return "ok ma couille";
    }

    public String GetDefaultData(String key)
    {
        MongoDatabase database = connectToMongo();
        MongoCollection<Document> collection = database.getCollection("MapsData", Document.class);
        Document searchQuery = new Document("_id", key);

        try {
            var rez = collection.find(searchQuery);
            JSONObject jsonObj = null;
            for (Document resultDoc : rez) {
                jsonObj = new JSONObject(resultDoc.toJson());
            }
            JSONArray rezJson = jsonObj.getJSONArray("Data");
            return rezJson.toString();
        } catch (Exception e) {
            return "ko";
        }
    }

    public String getObjectDetails(String placeId) {
        MongoCollection<Document> collection = _database.getCollection("MapsData", Document.class);

        try (MongoCursor<Document> cursor = collection.find().projection(new Document("_id", 0)).iterator()) {
            while (cursor.hasNext()) {
                Document doc = cursor.next();
                JSONObject tmp = new JSONObject(doc.toJson());
                if (tmp != null) {
                    JSONArray tmpArray = new JSONArray(tmp.getJSONArray("Data"));
                    
                    for (int i = 0; i < tmpArray.length(); i++) {
                        JSONObject tmpObj = tmpArray.getJSONObject(i);
                        if (tmpObj.getString("place_id").equals(placeId)) {
                            return tmpObj.toString();
                        }
                    }
                }
            }
        }
        return "ko";
    }



    public List<String> getCities() {
        
        MongoCollection<Document> collection = _database.getCollection("MapsData", Document.class);
        List<String> Cities = new ArrayList<>();
        try (MongoCursor<Document> cursor = collection.find().projection(new Document("_id", 1)).iterator()) {
            while (cursor.hasNext()) {
                Document doc = cursor.next();
                var tmp = doc.get("_id").toString();
                Cities.add(tmp.substring(0, tmp.indexOf("-")));
            }
        }
        List<String> RespCities = Cities.stream().distinct().toList();
        return RespCities;
    }

    public String updatePlace(String placeId, Object updatedValue) {
        // MongoCollection<Document> collection = _database.getCollection("MapsData", Document.class);

        // try (MongoCursor<Document> cursor = collection.find().projection(new Document("_id", 0)).iterator()) {
        //     while (cursor.hasNext()) {
        //         Document doc = cursor.next();
        //         JSONObject tmp = new JSONObject(doc.toJson());
        //         if (tmp != null) {
        //             JSONArray tmpArray = new JSONArray(tmp.getJSONArray("Data"));
        //             tmpArray.put(updatedValue);
        //             for (int i = 0; i < tmpArray.length(); i++) {
        //                 JSONObject tmpObj = tmpArray.getJSONObject(i);
        //                 if (tmpObj.getString("place_id").equals(placeId)) {
        //                     tmpArray.remove(i);
        //                     tmpArray.put(updatedValue);
        //                     // je sais pas si cet ligne marche en dessous, j'ai l'objet qui a etais changer et je dois le mettre dans mongodb maintenat
        //                     collection.updateOne(Filters.eq("_id", tmp.getString("_id")), Updates.set("Data", tmpArray));
        //                 }
        //             }
        //         }
        //     }
        // }
        return "ko";
    }

}

    


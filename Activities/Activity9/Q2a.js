var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017/";

MongoClient.connect(url, function(err, db) {
  if (err) throw err;
  var dbo = db.db("activity9");
  var query = { item : "journal" };
  var newValues = { $set : { "size.h" : 30.4}};
  dbo.collection("items").find(query).toArray(function(err, result){
    if (err) throw err;
    console.log(result);
  });
  dbo.collection("items").updateOne(query, newValues, function(err, res){
    if (err) throw err;
  });
  dbo.collection("items").find(query).toArray(function(err, result){
    if (err) throw err;
    console.log(result);
    db.close();
  });
});
var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017/";

MongoClient.connect(url, function(err, db) {
  if (err) throw err;
  var dbo = db.db("activity9");
  var query = { item : "mousepad" };
  dbo.collection("items").deleteOne(query, function(err, res){
    if (err) throw err;
    console.log(res.deletedCount + " Documents Deleted");
    db.close();
  });
});
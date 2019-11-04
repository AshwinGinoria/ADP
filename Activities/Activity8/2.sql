db.Students.bulkWrite(
    [
        { insertOne:
            {
                "document" : 
                {
                    "ROLL NO" : "B17033",
                    "Name" : "John",
                    "Age" : 23,
                    "Semester" : 5,
                    "GPA" : {CGPA:7.9, SGPA: 7.95, UOM: "GP"},
                    "Hometown" : "Kanpur"
                }
            }
        },
        { insertOne:
            {
                "document" : 
                {
                    "ROLL NO" : "B17053",
                    "Name" : "Harry",
                    "Age" : 29,
                    "Semester" : 8,
                    "GPA" : {CGPA:9.9, SGPA: 9.95, UOM: "GP"},
                    "Hometown" : "Lucknow"
                }
            }
        }
    ]
);

-
db.Students.update({ "ROLL NO" : "B17053" }, { $set : { "Hometown" : "Delhi" } });

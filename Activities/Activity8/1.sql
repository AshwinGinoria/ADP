use CS207;
db.Students.insert(
    [
        {
            "ROLL NO" : "B18048",
            "Name" : "Ashwin Ginoria",
            "Age" : 20,
            "Semester" : 3,
            "GPA" : {CGPA:8.2, SGPA: 9, UOM: "GP"},
            "Hometown" : "Kolkata"
        },
        {
            "ROLL NO" : "B18149",
            "Name" : "Vasu Gupta",
            "Age" : 20,
            "Semester" : 3,
            "GPA" : {CGPA:9.6, SGPA: 8, UOM: "GP"},
            "Hometown" : "Kolkata"
        },
        {
            "ROLL NO" : "B18093",
            "Name" : "Vyom Goel",
            "Age" : 20,
            "Semester" : 3,
            "GPA" : {CGPA:7.9, SGPA: 9, UOM: "GP"},
            "Hometown" : "Kolkata"
        },
        {
            "ROLL NO" : "B18191",
            "Name" : "Saransh Jain",
            "Age" : 20,
            "Semester" : 3,
            "GPA" : {CGPA:8.4, SGPA: 6, UOM: "GP"},
            "Hometown" : "Kolkata"
        },
        {
            "ROLL NO" : "B18166",
            "Name" : "Kartik Kathuria",
            "Age" : 20,
            "Semester" : 3,
            "GPA" : {CGPA:8, SGPA: 4, UOM: "GP"},
            "Hometown" : "Kolkata"
        }
    ]
);

db.Students.find().forEach(printjson);

db.Students.find({ "GPA.CGPA" : { $gt : 8 } });

db.Students.updateMany({ "GPA.SGPA" : { $lt : 8.5 } }, { $set : { "Hometown" : "Mandi", "GPA.UOM" : "Grade Point" } });

db.Students.deleteOne({ "Semester" : 3});


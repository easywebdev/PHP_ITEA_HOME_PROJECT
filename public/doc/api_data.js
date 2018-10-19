define({ "api": [
  {
    "type": "get",
    "url": "/home",
    "title": "Request Home Page",
    "name": "GetHomePage",
    "group": "Home_Page",
    "permission": [
      {
        "name": "All"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>Title for Home Page.</p>"
          },
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "sheduler",
            "description": "<p>Array of days and Lessons in day.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "Home",
            "description": "<p>Template for Home Page</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Home_Page"
  },
  {
    "type": "post",
    "url": "/request",
    "title": "Add Meeting",
    "name": "AddMeeting",
    "group": "Meetings",
    "permission": [
      {
        "name": "Parent"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "name",
            "description": "<p>Meeting Name.</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "topic",
            "description": "<p>Meeting Topic.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "userID",
            "description": "<p>User id, unique id.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Meetings"
  },
  {
    "type": "get",
    "url": "/request",
    "title": "Add Meeting Form",
    "name": "AddMeetingForm",
    "group": "Meetings",
    "permission": [
      {
        "name": "Parent"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "teachers",
            "description": "<p>All Teachers.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "SelectTeacherForm",
            "description": "<p>Template for Select Teacher Form.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Meetings"
  },
  {
    "type": "get",
    "url": "/deleterequest/:id",
    "title": "Delete Meeting",
    "name": "DeleteMeetings",
    "group": "Meetings",
    "permission": [
      {
        "name": "Director"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Meeting ID, unique id.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Meetings"
  },
  {
    "type": "post",
    "url": "/directorrequests",
    "title": "Director Meetings",
    "name": "DirectorMeetings",
    "group": "Meetings",
    "permission": [
      {
        "name": "Director"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "teacherID",
            "description": "<p>Teacher ID, unique id.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "meetings",
            "description": "<p>All Meetings for selected Teacher.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "ShowDirectorRequests",
            "description": "<p>Template Meetings for selected Teacher.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Meetings"
  },
  {
    "type": "get",
    "url": "/directorrequests",
    "title": "Director Meetings Form",
    "name": "DirectorMeetingsForm",
    "group": "Meetings",
    "permission": [
      {
        "name": "Director"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "teachers",
            "description": "<p>All Teachers.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "ShowDirectorRequestForm",
            "description": "<p>Template for select Teacher Meetings.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Meetings"
  },
  {
    "type": "get",
    "url": "/showrequests",
    "title": "Parent Meetings",
    "name": "GetMeeting",
    "group": "Meetings",
    "permission": [
      {
        "name": "Parent"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "meetings",
            "description": "<p>All Meetings for current Parent.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "ShowParentRequests",
            "description": "<p>Template for Parent Meetings.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Meetings"
  },
  {
    "type": "get",
    "url": "/teacherrequests",
    "title": "Teacher Meetings",
    "name": "GetTeacherMeetings",
    "group": "Meetings",
    "permission": [
      {
        "name": "Teacher"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "meetings",
            "description": "<p>All Meetings for current Teacher.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "ShowTeacherRequest",
            "description": "<p>Template for Teacher Meetings.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Meetings"
  },
  {
    "type": "post",
    "url": "/teacherrequests",
    "title": "Update Status Meetings",
    "name": "UpdateMeetings",
    "group": "Meetings",
    "permission": [
      {
        "name": "Teacher"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "meetingID",
            "description": "<p>Meeting ID, unique id.</p>"
          },
          {
            "group": "Parameter",
            "type": "Enumerable",
            "optional": false,
            "field": "status",
            "description": "<p>Meeting Status: accepted or not (&quot;1&quot;;&quot;0&quot;) .</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Meetings"
  },
  {
    "type": "post",
    "url": "/addshedulelesson/:id",
    "title": "Add Lesson",
    "name": "AddLesson",
    "group": "Shedule",
    "permission": [
      {
        "name": "Director"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>dayID unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "lessonID",
            "description": "<p>ID of added Lesson, unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "position",
            "description": "<p>Lesson position in Day unique.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Shedule"
  },
  {
    "type": "get",
    "url": "/addshedulelesson/:id",
    "title": "Add Lesson Form",
    "name": "AddLessonForm",
    "group": "Shedule",
    "permission": [
      {
        "name": "Director"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>dayID unique ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "dayName",
            "description": "<p>Name of day for add lesson.</p>"
          },
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "lessons",
            "description": "<p>Array of all Lessons.</p>"
          },
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "lpositions",
            "description": "<p>Array of all  Lessons position for this day.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "atLast",
            "description": "<p>Number last position + 1.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "AddLessonForm",
            "description": "<p>Template for show Add Lesson Form.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Shedule"
  },
  {
    "type": "get",
    "url": "/delshedule/day/:dayID/dellesson/:lesonID/position/:positionID",
    "title": "Delete Lesson",
    "name": "DelLesson",
    "group": "Shedule",
    "permission": [
      {
        "name": "Director"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "dayID",
            "description": "<p>dayID unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "lessonID",
            "description": "<p>lessonID unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "positionID",
            "description": "<p>positionID unique ID.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Shedule"
  },
  {
    "type": "get",
    "url": "/editshedule",
    "title": "Edit Shedule",
    "name": "EditShedule",
    "group": "Shedule",
    "permission": [
      {
        "name": "Director"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "Days",
            "description": "<p>Array of all working days.</p>"
          },
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "Lessons",
            "description": "<p>Array of all Lessons.</p>"
          },
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "DaysLessons",
            "description": "<p>Array of lessons in each day.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "ShowDayLessons",
            "description": "<p>Template for Edit Shedule.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Shedule"
  },
  {
    "type": "get",
    "url": "/shedule",
    "title": "Request Shedule",
    "name": "GetShedule",
    "group": "Shedule",
    "permission": [
      {
        "name": "All"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>Title for Home Page.</p>"
          },
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "sheduler",
            "description": "<p>Array of days and Lessons in day.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "Home",
            "description": "<p>Template for Shedule</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Shedule"
  },
  {
    "type": "post",
    "url": "/editshedule",
    "title": "Update Shedule",
    "name": "UpdateShedule",
    "group": "Shedule",
    "permission": [
      {
        "name": "Director"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "adayID",
            "description": "<p>Mandatory Day ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "lessonID",
            "description": "<p>Mandatory Lesson ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "position",
            "description": "<p>Mandatory Day ID.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Shedule"
  },
  {
    "type": "post",
    "url": "/updatestatistic/student/:studentID/lesson/:lessonID/addstatistic",
    "title": "Add Statistic.",
    "name": "AddStatistic",
    "group": "Statistic",
    "permission": [
      {
        "name": "Teacher"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "users_id",
            "description": "<p>User id, unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "lessons_id",
            "description": "<p>Lesson id, unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "rating",
            "description": "<p>Rating.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Statistic"
  },
  {
    "type": "get",
    "url": "/updatestatistic/student/:studentID/lesson/:lessonID/addstatistic",
    "title": "Add Statistic Form.",
    "name": "AddStatisticForm",
    "group": "Statistic",
    "permission": [
      {
        "name": "Teacher"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "studentID",
            "description": "<p>User id, unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "lessonID",
            "description": "<p>Lesson id, unique ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "studentID",
            "description": "<p>User id, unique ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "lessonID",
            "description": "<p>Lesson id, unique ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "studentName",
            "description": "<p>Student full name.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "lessonName",
            "description": "<p>Lesson name.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "AddStatForm",
            "description": "<p>Template for Student Add.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Statistic"
  },
  {
    "type": "post",
    "url": "/directorstatistic",
    "title": "All Statistic.",
    "name": "AllStatistic",
    "group": "Statistic",
    "permission": [
      {
        "name": "Director"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "stat",
            "description": "<p>All Statistic for selected Lesson.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "ShowDirectorStat",
            "description": "<p>Template for Statistic for selected Lesson.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Statistic"
  },
  {
    "type": "get",
    "url": "/directorstatistic",
    "title": "All Statistic Form.",
    "name": "AllStatisticForm",
    "group": "Statistic",
    "permission": [
      {
        "name": "Director"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "lessons",
            "description": "<p>All Lessons.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "DirectorStatForm",
            "description": "<p>Template for Select Lesson to get Statistic.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Statistic"
  },
  {
    "type": "get",
    "url": "/delstatistic/:id",
    "title": "Delete Statistic.",
    "name": "DelStatistic",
    "group": "Statistic",
    "permission": [
      {
        "name": "Teacher"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Statistic id, unique ID.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Statistic"
  },
  {
    "type": "post",
    "url": "/editstatistic",
    "title": "Edit Statistic Form.",
    "name": "EditStatisticForm",
    "group": "Statistic",
    "permission": [
      {
        "name": "Teacher"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "student_id",
            "description": "<p>User id, unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "lesson_id",
            "description": "<p>Lesson id, unique ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "route",
            "optional": false,
            "field": "updatestatistic/student/",
            "description": "<p>All Students.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Statistic"
  },
  {
    "type": "get",
    "url": "/astatistic/:id",
    "title": "Get User Statistic.",
    "name": "GetStatistic",
    "group": "Statistic",
    "permission": [
      {
        "name": "Student or Parent"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>User id, unique ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "stat",
            "description": "<p>All Statistic for selected User.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "student_stat",
            "description": "<p>Template for User Stat.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Statistic"
  },
  {
    "type": "get",
    "url": "/editstatistic",
    "title": "Select Param Form.",
    "name": "GetStatisticParam",
    "group": "Statistic",
    "permission": [
      {
        "name": "Teacher"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "students",
            "description": "<p>All Students.</p>"
          },
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "lessons",
            "description": "<p>All Lessons.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "TeacherStatForm",
            "description": "<p>Template for select User and Lesson.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Statistic"
  },
  {
    "type": "post",
    "url": "/updatestatistic/student/:studentID/lesson/:lessonID",
    "title": "Update Statistic.",
    "name": "UpdateStatistic",
    "group": "Statistic",
    "permission": [
      {
        "name": "Teacher"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "studentID",
            "description": "<p>User id, unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "lessonID",
            "description": "<p>Lesson id, unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Statistic id, unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "rating",
            "description": "<p>Student Rating.</p>"
          },
          {
            "group": "Parameter",
            "type": "timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>DataTime Create.</p>"
          },
          {
            "group": "Parameter",
            "type": "timestamp",
            "optional": false,
            "field": "updated_at",
            "description": "<p>DataTime Update.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Statistic"
  },
  {
    "type": "get",
    "url": "/updatestatistic/student/:studentID/lesson/:lessonID",
    "title": "Update Statistic Form.",
    "name": "UpdateStatisticForm",
    "group": "Statistic",
    "permission": [
      {
        "name": "Teacher"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "studentID",
            "description": "<p>User id, unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "lessonID",
            "description": "<p>Lesson id, unique ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "stat",
            "description": "<p>Statistic for Student.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "studentName",
            "description": "<p>Student First Name and Last Name.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "lessonName",
            "description": "<p>Lesson Name.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "EditStatForm",
            "description": "<p>Template for Update Statistic.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Statistic"
  },
  {
    "type": "get",
    "url": "/users",
    "title": "All Users",
    "name": "GetUsers",
    "group": "Users",
    "permission": [
      {
        "name": "Director"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "roles",
            "description": "<p>All Roles.</p>"
          },
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "users",
            "description": "<p>All Users.</p>"
          },
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "students",
            "description": "<p>All Students.</p>"
          },
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "lessons",
            "description": "<p>All Lessons.</p>"
          },
          {
            "group": "Success 200",
            "type": "view",
            "optional": false,
            "field": "ShowDirectorUsersForm",
            "description": "<p>Template Users and their Roles.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Users"
  },
  {
    "type": "post",
    "url": "/users",
    "title": "Update Users",
    "name": "UpdateUsers",
    "group": "Users",
    "permission": [
      {
        "name": "Director"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "array",
            "optional": false,
            "field": "users",
            "description": "<p>Key = userID Value = roleID.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "Users"
  }
] });

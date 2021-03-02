assignment_tracker(database) = todolist(database)
        
        assignments(table) = items(table)
        
            ID(PK) = ID(PK)
            Description(VARCHAR MAXLENGTH 120) =  Description(VARCHAR MAXLENGTH 120)
            courseID(FK) = Category(FK)
        
        courses(table) = tasks(table)

            courseID(PK) = taskID(PK)
            courseName(VARCHAR MAXLENGTH 50) = taskName(VARCHAR MAXLENGTH 50)
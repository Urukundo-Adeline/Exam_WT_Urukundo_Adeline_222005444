<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Resume Writing Workshop</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <h1>Virtual Resume Writing Workshop</h1>
    </header>
    <main>
        <section id="attendees">
            <h2>Attendees</h2>
            <form id="attendeesForm">
                <label for="attendeeName">Name:</label>
                <input type="text" id="attendeeName" name="attendeeName" required>
                <label for="attendeeEmail">Email:</label>
                <input type="email" id="attendeeEmail" name="attendeeEmail" required>
                <button type="submit">Submit</button>
            </form>
        </section>

        <section id="feedback">
            <h2>Feedback</h2>
            <form id="feedbackForm">
                <label for="feedbackWorkshop">Workshop Attended:</label>
                <select id="feedbackWorkshop" name="feedbackWorkshop">
                    <option value="workshop1">Workshop 1</option>
                    <option value="workshop2">Workshop 2</option>
                    <option value="workshop3">Workshop 3</option>
                </select>
                <label for="feedbackComments">Comments:</label>
                <textarea id="feedbackComments" name="feedbackComments" required></textarea>
                <button type="submit">Submit Feedback</button>
            </form>
        </section>

        <section id="certificates">
            <h2>Certificates</h2>
            <form id="certificatesForm">
                <label for="certificateName">Name:</label>
                <input type="text" id="certificateName" name="certificateName" required>
                <label for="certificateWorkshop">Workshop:</label>
                <select id="certificateWorkshop" name="certificateWorkshop">
                    <option value="workshop1">Workshop 1</option>
                    <option value="workshop2">Workshop 2</option>
                    <option value="workshop3">Workshop 3</option>
                </select>
                <button type="submit">Generate Certificate</button>
            </form>
        </section>

        <section id="instructors">
            <h2>Instructors</h2>
            <form id="instructorsForm">
                <label for="instructorName">Name:</label>
                <input type="text" id="instructorName" name="instructorName" required>
                <label for="instructorEmail">Email:</label>
                <input type="email" id="instructorEmail" name="instructorEmail" required>
                <label for="instructorBio">Bio:</label>
                <textarea id="instructorBio" name="instructorBio" required></textarea>
                <button type="submit">Add Instructor</button>
            </form>
        </section>

        <section id="payment">
            <h2>Payment</h2>
            <form id="paymentForm">
                <label for="paymentName">Name:</label>
                <input type="text" id="paymentName" name="paymentName" required>
                <label for="paymentAmount">Amount:</label>
                <input type="number" id="paymentAmount" name="paymentAmount" required>
                <button type="submit">Submit Payment</button>
            </form>
        </section>

        <section id="resources">
            <h2>Resources</h2>
            <form id="resourcesForm">
                <label for="resourceTitle">Title:</label>
                <input type="text" id="resourceTitle" name="resourceTitle" required>
                <label for="resourceLink">Link:</label>
                <input type="url" id="resourceLink" name="resourceLink" required>
                <button type="submit">Add Resource</button>
            </form>
        </section>

        <section id="users">
            <h2>Users</h2>
            <form id="usersForm">
                <label for="userName">Name:</label>
                <input type="text" id="userName" name="userName" required>
                <label for="userEmail">Email:</label>
                <input type="email" id="userEmail" name="userEmail" required>
                <button type="submit">Add User</button>
            </form>
        </section>

        <section id="workshop">
            <h2>Workshops</h2>
            <form id="workshopForm">
                <label for="workshopTitle">Title:</label>
                <input type="text" id="workshopTitle" name="workshopTitle" required>
                <label for="workshopDescription">Description:</label>
                <textarea id="workshopDescription" name="workshopDescription" required></textarea>
                <button type="submit">Add Workshop</button>
            </form>
        </section>

        <section id="workshopSchedule">
            <h2>Workshop Schedule</h2>
            <form id="workshopScheduleForm">
                <label for="scheduleWorkshop">Workshop:</label>
                <select id="scheduleWorkshop" name="scheduleWorkshop">
                    <option value="workshop1">Workshop 1</option>
                    <option value="workshop2">Workshop 2</option>
                    <option value="workshop3">Workshop 3</option>
                </select>
                <label for="scheduleDate">Date:</label>
                <input type="date" id="scheduleDate" name="scheduleDate" required>
                <button type="submit">Add Schedule</button>
            </form>
        </section>

        <section id="workshopResources">
            <h2>Workshop Resources</h2>
            <form id="workshopResourcesForm">
                <label for="resourceWorkshop">Workshop:</label>
                <select id="resourceWorkshop" name="resourceWorkshop">
                    <option value="workshop1">Workshop 1</option>
                    <option value="workshop2">Workshop 2</option>
                    <option value="workshop3">Workshop 3</option>
                </select>
                <label for="resourceDescription">Description:</label>
                <textarea id="resourceDescription" name="resourceDescription" required></textarea>
                <label for="resourceFile">Upload File:</label>
                <input type="file" id="resourceFile" name="resourceFile" required>
                <button type="submit">Add Resource</button>
            </form>
        </section>
    </main>
    <script src="scripts/main.js"></script>
</body>
</html>

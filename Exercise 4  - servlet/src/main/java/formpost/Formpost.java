// Import required java libraries
package formpost;

import java.io.*;
import javax.servlet.*;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.*;

// Servlet annotation to map the URL pattern to this servlet
@WebServlet("/register")
public class Formpost extends HttpServlet {

    private static final long serialVersionUID = 1L;

    // Method to handle POST requests
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        // Set response content type
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        // Fetch form parameters
        String student_name = request.getParameter("student_name");
        String rollno = request.getParameter("rollno");
        String gender = request.getParameter("gender");
        String year = request.getParameter("year");
        String department = request.getParameter("department");
        String mobile_no = request.getParameter("mobile_no");
        String email = request.getParameter("email");
        String address = request.getParameter("address");

        // Display submitted data (or you can process/store it in a database)
        out.println("<html><body>");
        out.println("<h2>Registration Details</h2>");
        out.println("<p><strong>Name: </strong>" + student_name + "</p>");
        out.println("<p><strong>Roll No: </strong>" + rollno + "</p>");
        out.println("<p><strong>Gender: </strong>" + gender + "</p>");
        out.println("<p><strong>Year: </strong>" + year + "</p>");
        out.println("<p><strong>Department: </strong>" + department + "</p>");
        out.println("<p><strong>Mobile No: </strong>" + mobile_no + "</p>");
        out.println("<p><strong>Email: </strong>" + email + "</p>");
        out.println("<p><strong>Address: </strong>" + address + "</p>");
        out.println("</body></html>");
    }
}

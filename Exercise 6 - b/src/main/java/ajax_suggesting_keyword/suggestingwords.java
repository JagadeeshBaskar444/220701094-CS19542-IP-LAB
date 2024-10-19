package ajax_suggesting_keyword;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/suggestingwords")
public class suggestingwords extends HttpServlet {
    private static final long serialVersionUID = 1L;

    public suggestingwords() {
        super();
    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String query = request.getParameter("query");

        // Dummy list of student names
        String[] students = {"Jagadeesh","Jaganaath","Joel","Jayaprakash","Kiruththik","Kailaash","Guhanraj","Espin"};

        // Prepare the response as HTML
        response.setContentType("text/html");
        StringBuilder suggestions = new StringBuilder();

        // Loop through student names and append those matching the query
        for (String student : students) {
            if (student.toLowerCase().startsWith(query.toLowerCase())) {
                // Add each suggestion in a clickable div
                suggestions.append("<div onclick=\"selectName('").append(student).append("')\">")
                           .append(student).append("</div>");
            }
        }

        // Send the suggestions back as the response
        response.getWriter().write(suggestions.toString());
    }
}

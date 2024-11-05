package servletcode.java;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/BookServlet")
public class BookServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        String title = request.getParameter("title");
        String author = request.getParameter("author");
        String publisher = request.getParameter("publisher");
        String edition = request.getParameter("edition");
        String price = request.getParameter("price");

        try {
            // Step 1: Load the JDBC driver
            Class.forName("com.mysql.cj.jdbc.Driver");

            // Step 2: Create a connection to the database
            Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/LibraryDB", "root", "password");

            // Step 3: Create the SQL query
            String sql = "INSERT INTO BOOK (TITLE, AUTHOR, PUBLISHER, EDITION, PRICE) VALUES (?, ?, ?, ?, ?)";

            // Step 4: Create the prepared statement and execute the query
            PreparedStatement stmt = conn.prepareStatement(sql);
            stmt.setString(1, title);
            stmt.setString(2, author);
            stmt.setString(3, publisher);
            stmt.setString(4, edition);
            stmt.setString(5, price);

            int rows = stmt.executeUpdate();
            if (rows > 0) {
                out.println("<h3>Book information inserted successfully!</h3>");
            }

            // Step 5: Close the connection
            stmt.close();
            conn.close();
        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            out.close();
        }
    }
}

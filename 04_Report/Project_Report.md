# Web Application Security Assessment Project

## 1. Introduction
> A brief description of the project: "This project demonstrates the identification, exploitation, and remediation of three critical web vulnerabilities (SQL Injection, XSS, and CSRF) using a controlled lab environment."

## 2. Tools and Technologies
- XAMPP
- Damn Vulnerable Web Application (DVWA)
- PHP, MySQL
- VS Code

## 3. Vulnerability Findings and Exploitation

### 3.1. SQL Injection
- **Description**: A vulnerability that allows attackers to interfere with database queries.
- **Impact**: Allows retrieval of all user data, bypassing authentication.
- **Exploitation Steps**:
    1. Navigate to `http://localhost/dvwa/vulnerabilities/sqli/`.
    2. Input `1' OR '1'='1` into the User ID field.
    3. The database returns all records.
- **Evidence**:
    ![SQL Injection Result](../02_Exploitation_Evidence/1_SQL_Injection_Result.png)
- **Remediation**:
    - **Vulnerable Code**: `$query = "SELECT * FROM users WHERE id = $user_id";`
    - **Secure Code**:
        ```php
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
    - **Prevention Mechanism**: Prepared Statements separate SQL logic from data, making injection impossible.       

### 3.2. Cross-Site Scripting (XSS)
- **Description**: Allows attackers to inject client-side scripts into web pages.
- **Impact**: Cookie theft, session hijacking, redirection to malicious sites.
- **Exploitation Steps**:
    1. Navigate to http://localhost/dvwa/vulnerabilities/xss_r/.
    2. Input <script>alert('XSS')</script> into the name field.
    3. The script executes in the user's browser.
- **Evidence**:
    ![XSS Popup](../02_Exploitation_Evidence/2_XSS_Popup.png)
- **Remediation**:
    - **Vulnerable Code**: echo "Hello " . $_POST['name'];
    - **Secure Code**:
        ```php
        echo "Hello " . htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    - **Prevention Mechanism**: Output encoding converts HTML tags into harmless text entities.       

### 3.3. Cross-Site Request Forgery (CSRF)
- **Description**: Forces authenticated users to perform unwanted actions.
- **Impact**: Password changes, fund transfers, profile modifications.
- **Exploitation Steps**:
    1. Visit the crafted URL: 
       http://localhost/dvwa/vulnerabilities/csrf/?password_new=hacked&password_conf=hacked&Change=Change#
    2. The password is changed without the user's knowledge.
- **Evidence**:
    ![CSRF Success](../02_Exploitation_Evidence/3_CSRF_Success.png)
- **Remediation**:
    - **Vulnerable Code**: Directly updating the database without token validation.
    - **Secure Code**:
        ```php
        // Generate and validate a unique CSRF token per session
    - **Prevention Mechanism**: A unique, unpredictable token is required for each state-changing request. Without this token, the server rejects the request, making CSRF attacks impossible.



## 5. Conclusion

This project successfully demonstrated the end-to-end process of a web application security assessment. By exploiting and then fixing SQL Injection, XSS, and CSRF, I have proven my understanding of both offensive and defensive security practices.

### Key Takeaways:
- **Secure coding practices** are essential to protect applications.
- **Input validation, output encoding, and token-based authentication** are critical security controls.
- A proactive approach to security is better than reactive remediation.
- Understanding how attackers work helps developers build better defenses.

### Future Improvements:
- Test more vulnerabilities like Command Injection and File Upload attacks.
- Implement a Web Application Firewall (WAF).
- Conduct automated vulnerability scanning.


## 6. References
- OWASP Top 10 (2021): https://owasp.org/Top10/
- DVWA Documentation: https://github.com/digininja/DVWA
- PHP Manual: https://www.php.net/manual/en/
- XAMPP Documentation: https://www.apachefriends.org/
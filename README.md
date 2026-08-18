# Web Application Security Assessment & Hardening

## Project Description

This project is a hands-on demonstration of identifying, exploiting, and remediating critical web vulnerabilities, including:
- SQL Injection
- Cross-Site Scripting (XSS)
- Cross-Site Request Forgery (CSRF)

The project was conducted in a controlled lab environment using the Damn Vulnerable Web Application (DVWA). The goal is to show how attackers exploit vulnerabilities and how developers can fix them using secure coding practices.

---

## Tech Stack

- **Environment**: XAMPP (Apache, MySQL)
- **Application**: DVWA (Damn Vulnerable Web Application)
- **Languages**: PHP, HTML, SQL
- **Tools**: VS Code, Browser Developer Tools

---

## Project Structure

### WebApp-Security-Assessment-Project/

- 01_Vulnerable_App/ # DVWA installation files
- 02_Exploitation_Evidence/ # Screenshots of attacks (3 images)
- 03_Code_Snippets/ # Vulnerable vs. Secure code (PHP files)
- 04_Report/ # Final detailed report (Project_Report.md)
- 05_README.md # This file

---

## How to Recreate This Project

### 1. Prerequisites
- Download and install XAMPP from: https://www.apachefriends.org/
- Download DVWA from: https://github.com/digininja/DVWA

### 2. Setup
- Move the DVWA folder to `C:\xampp\htdocs\`.
- Rename `config.inc.php.dist` to `config.inc.php`.
- Open `config.inc.php` and set the database password (leave blank for XAMPP default).
- Start Apache and MySQL in XAMPP.
- Navigate to `http://localhost/dvwa/setup.php` and click "Create/Reset Database".
- Log in with `admin` / `password`.

### 3. Conduct Attacks
- Set the security level to "Low".
- Perform SQL Injection, XSS, and CSRF attacks as documented in `04_Report/Project_Report.md`.
- Take screenshots of each successful attack and save them in `02_Exploitation_Evidence/`.

### 4. Remediation
- Write secure code to fix each vulnerability:
  - Use **Prepared Statements** for SQL Injection.
  - Use **htmlspecialchars()** for XSS.
  - Use **Anti-CSRF Tokens** for CSRF.
- Save the secure code in `03_Code_Snippets/`.

---

## Key Findings

| Vulnerability | Impact | Fix |
|---------------|--------|-----|
| **SQL Injection** | Exposed all user records from the database | Prepared Statements |
| **XSS** | Executed arbitrary JavaScript in the victim's browser | Output encoding (`htmlspecialchars()`) |
| **CSRF** | Changed the user's password without their consent | Anti-CSRF Tokens |

---

## Remediation Summary

- **SQL Injection**: Used **Prepared Statements** to separate SQL logic from data.
- **XSS**: Used **htmlspecialchars()** to encode special characters before output.
- **CSRF**: Implemented **Anti-CSRF Tokens** to validate each state-changing request.

---

## How to View the Full Report

The complete report with detailed exploitation steps, screenshots, and code fixes is available in `04_Report/Project_Report.md`.

---

## Connect with Me

- **GitHub**: [Your GitHub Link]

---

## License

This project is for educational purposes only. All tools and techniques should only be used in a controlled, authorized environment.
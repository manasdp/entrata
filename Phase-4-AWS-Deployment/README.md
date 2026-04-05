# AWS Deployment Guide

## 🚀 Steps to Deploy

1. Launch EC2 Instance (Ubuntu)

2. Install Docker & Docker Compose

3. Clone Repository:
   git clone https://github.com/manasdp/entrata.git

4. Navigate:
   cd entrata

5. Run Docker:
   docker-compose up --build -d

6. Access App:
   http://<EC2-PUBLIC-IP>:8080

---

## 🔐 Security Group Rules

* Port 22 (SSH)
* Port 80 (HTTP)
* Port 8080 (App)

---

## 🐳 Services

* PHP Apache Container
* MySQL Container

---

## 🧠 Notes

* Ensure DB is imported using SQL file
* Update DB host to `mysql_db` in include.php

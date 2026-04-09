
#!/bin/bash

# ==========================================
# LINUX PROCESS MANAGEMENT COMMANDS
# ==========================================

# ----------- VIEW RUNNING PROCESSES ------------

# Show current shell processes
ps   # Displays processes for current terminal

# Detailed process list
ps -ef   # Full-format listing of all processes

# Alternative detailed view
ps aux   # Shows all processes with CPU & memory usage

# Real-time process monitoring
top   # Live process usage (press 'q' to quit)

# Better process viewer (if installed)
htop   # Interactive UI (install using: sudo apt install htop)

# ----------- FIND PROCESSES ------------

# Find process by name
ps aux | grep nginx   # Search for 'nginx' process

# Get process ID (PID)
pidof nginx   # Returns PID of process

# ----------- KILL / STOP PROCESSES ------------

# Kill process by PID
kill 1234   # Gracefully stop process

# Force kill process
kill -9 1234   # Forcefully terminate process (SIGKILL)

# Kill by name
pkill nginx   # Kill all nginx processes

# Kill all instances
killall nginx   # Same as pkill

# ----------- PROCESS PRIORITY ------------

# Run process with priority
nice -n 10 ./script.sh   # Lower priority (10)

# Change priority of running process
renice 5 -p 1234   # Set priority of PID 1234

# ----------- BACKGROUND & FOREGROUND ------------

# Run process in background
sleep 100 &   # Runs in background

# Show background jobs
jobs   # Lists running background jobs

# Bring job to foreground
fg %1   # Bring job 1 to foreground

# Send job to background
bg %1   # Resume job in background

# ----------- SYSTEM MONITORING ------------

# Show memory usage
free -m   # Displays RAM usage

# Show CPU info
lscpu   # Displays CPU details

# Show system uptime
uptime   # Shows how long system is running

# ----------- SERVICE MANAGEMENT ------------

# Start service
sudo systemctl start nginx   # Starts nginx server

# Stop service
sudo systemctl stop nginx   # Stops nginx

# Restart service
sudo systemctl restart nginx   # Restart service

# Check status
sudo systemctl status nginx   # Shows service status

# Enable service at boot
sudo systemctl enable nginx   # Auto start on boot

# Disable service
sudo systemctl disable nginx   # Disable auto start

# ----------- PROCESS TREE ------------

# Show process hierarchy
pstree   # Displays parent-child processes

# ==========================================
# PRACTICE TASKS
# ==========================================

# 1. Run a background process
sleep 200 &

# 2. Check running jobs
jobs

# 3. Find process
ps aux | grep sleep

# 4. Kill process
kill -9 <PID>

# 5. Check system performance
top

# ==========================================
# END
# ==========================================
```

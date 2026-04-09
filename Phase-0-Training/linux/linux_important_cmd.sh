
#!/bin/bash

# ==========================================
# LINUX IMPORTANT COMMANDS (CHEAT SHEET)
# ==========================================

# ----------- SYSTEM INFO ------------

uname -a   # Shows system/kernel info
hostname   # Displays system name
date       # Current date & time
uptime     # System running time
whoami     # Current user

# ----------- DISK & STORAGE ------------

df -h      # Disk space usage (human readable)
du -sh *   # Folder size
lsblk      # Shows disks & partitions
mount      # Mounted file systems

# ----------- MEMORY ------------

free -m    # Memory usage in MB

# ----------- NETWORKING ------------

ip a       # Show IP address (modern)
ifconfig   # Network info (older command)

ping google.com   # Check internet connectivity

curl http://example.com   # Fetch webpage
wget http://example.com/file.zip   # Download file

netstat -tulnp   # Show open ports (older)
ss -tulnp        # Modern alternative

# ----------- PACKAGE MANAGEMENT (UBUNTU) ------------

sudo apt update        # Update package list
sudo apt upgrade       # Upgrade packages
sudo apt install git   # Install package
sudo apt remove git    # Remove package

# ----------- ARCHIVE & COMPRESSION ------------

# Create tar archive
tar -cvf archive.tar file.txt

# Extract tar
tar -xvf archive.tar

# Create gzip
gzip file.txt

# Extract gzip
gunzip file.txt.gz

# Create zip
zip archive.zip file.txt

# Extract zip
unzip archive.zip

# ----------- PERMISSIONS ------------

chmod 755 file.sh   # Change permissions
chown user file.txt   # Change owner

# ----------- ENVIRONMENT VARIABLES ------------

echo $HOME   # Home directory
echo $PATH   # Executable paths

export VAR="Hello"   # Create variable

# ----------- HISTORY ------------

history   # Show command history
!!        # Run last command
!10       # Run command number 10

# ----------- SHORTCUTS ------------

# CTRL + C → Stop process
# CTRL + Z → Pause process
# CTRL + R → Search history
# TAB → Auto-complete

# ----------- REDIRECTION ------------

echo "Hello" > file.txt   # Write to file
echo "World" >> file.txt  # Append

# Redirect errors
command 2> error.log   # Save errors

# Redirect output + error
command > output.log 2>&1

# ----------- PIPE ------------

ls -l | grep ".sh"   # Filter output

# ----------- ALIAS ------------

alias ll='ls -la'   # Create shortcut
alias gs='git status'

# Remove alias
unalias ll

# ----------- CRON JOBS ------------

crontab -e   # Edit cron jobs

# Example:
# * * * * * echo "Hello" >> test.txt
# (Runs every minute)

# ----------- SHUTDOWN ------------

shutdown now        # Shutdown system
reboot              # Restart system

# ----------- USER MANAGEMENT ------------

sudo adduser newuser   # Create user
sudo passwd newuser    # Set password

sudo userdel newuser   # Delete user

# ----------- GROUP MANAGEMENT ------------

sudo groupadd devs   # Create group
sudo usermod -aG devs user   # Add user to group

# ----------- LOGS ------------

dmesg   # Kernel logs
journalctl   # System logs

# View logs live
journalctl -f

# ----------- DOWNLOAD & GIT ------------

git clone <repo_url>   # Clone repo
git pull origin main   # Pull updates
git status             # Check status

# ----------- DOCKER (FOR YOU 🔥) ------------

docker ps             # Running containers
docker ps -a          # All containers

docker images         # List images
docker build -t app . # Build image

docker run -d -p 80:80 app   # Run container

docker stop <id>      # Stop container
docker rm <id>        # Remove container

# ----------- AWS / SERVER ------------

ssh ubuntu@ip_address   # Connect to server

# Copy file to server
scp file.txt ubuntu@ip:/home/ubuntu/

# ----------- SEARCH ------------

grep "error" file.txt   # Search inside file
find . -name "*.php"    # Find files

# ----------- END ------------

# This file contains:
# ✔ Basic commands
# ✔ Networking
# ✔ Process & system
# ✔ DevOps tools
# ✔ Real-world usage

# ==========================================
# END OF FILE
# ==========================================
```

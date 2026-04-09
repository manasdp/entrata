```bash
#!/bin/bash

# ==========================================
# LINUX DIRECTORY MANAGEMENT COMMANDS
# ==========================================

# ----------- CREATE DIRECTORIES ------------

# Create a single directory
mkdir mydir   # Creates a folder named 'mydir'

# Create multiple directories
mkdir dir1 dir2 dir3   # Creates multiple folders

# Create nested directories
mkdir -p parent/child/grandchild   # Creates full path

# ----------- REMOVE DIRECTORIES ------------

# Remove empty directory
rmdir mydir   # Deletes only if directory is empty

# Remove directory with content
rm -r mydir   # Deletes directory and its contents

# Force remove directory
rm -rf mydir   # Deletes without confirmation

# ----------- COPY DIRECTORIES ------------

# Copy directory recursively
cp -r source_dir destination_dir   # Copies entire directory

# Copy with confirmation
cp -ri source_dir destination_dir   # Ask before overwrite

# ----------- MOVE / RENAME DIRECTORIES ------------

# Rename directory
mv old_dir new_dir   # Renames folder

# Move directory
mv mydir /home/user/   # Moves folder to another location

# ----------- VIEW DIRECTORY CONTENT ------------

# List directory contents
ls mydir   # Shows files inside directory

# Detailed list
ls -l mydir   # Shows permissions, size, owner

# Include hidden files
ls -a mydir   # Shows hidden files

# ----------- CHECK DIRECTORY ------------

# Check if directory exists
[ -d mydir ] && echo "Directory exists" || echo "Not found"

# Show directory size
du -sh mydir   # Displays total size

# ----------- DIRECTORY NAVIGATION ------------

# Enter directory
cd mydir   # Move into directory

# Go back
cd ..   # Move to parent directory

# Go to home directory
cd ~   # User home directory

# Go to previous directory
cd -   # Last visited directory

# ----------- TREE STRUCTURE ------------

# Show directory tree 
tree mydir   # Displays folder structure

# Install tree command (Ubuntu)
# sudo apt install tree

# ----------- FIND DIRECTORIES ------------

# Find directory by name
find . -type d -name "mydir"   # Search in current directory

# Find in entire system
find / -type d -name "mydir"   # Search from root

# ----------- PERMISSIONS (DIRECTORIES) ------------

# Change permissions
chmod 755 mydir   # Read/Write/Execute for owner

# Change owner
chown ubuntu mydir   # Change directory owner

# ==========================================
# PRACTICE TASKS
# ==========================================

# 1. Create nested directory
mkdir -p project/src/components

# 2. Navigate into it
cd project/src/components

# 3. Go back to root project
cd ../../

# 4. Copy directory
cp -r project backup_project

# 5. Rename directory
mv backup_project project_backup

# 6. Delete directory
rm -r project_backup

# ==========================================
# END
# ==========================================
```

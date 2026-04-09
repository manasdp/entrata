
#!/bin/bash

# ================================
# LINUX FILE SYSTEM NAVIGATION
# ================================

# Print current working directory
pwd   # Shows your current location in the filesystem

# List files and directories
ls    # Lists files in current directory

# List with details
ls -l   # Shows permissions, owner, size, date

# List hidden files
ls -a   # Includes hidden files (starting with .)

# Combine options
ls -la  # Detailed + hidden files

# Change directory
cd /home   # Move to /home directory

# Go back one directory
cd ..   # Moves to parent directory

# Go to root directory
cd /   # Root of the filesystem

# Go to home directory
cd ~   # Current user's home directory

# Go to previous directory
cd -   # Switches to last visited directory

# Absolute path navigation
cd /var/log   # Full path from root

# Relative path navigation
cd folder_name   # From current directory

# Tab auto-completion
# Type 'cd Do' + press TAB → auto completes directory name

# Clear terminal screen
clear   # Clears terminal output

# Display directory tree
tree   # Shows folder structure (may need installation)

# Show current user
whoami   # Displays logged-in username

# Show hostname
hostname   # Displays system name

# Show full path of a file
realpath file.txt   # Converts relative path to absolute

# Find location of a command
which ls   # Shows path of 'ls' command

# Find files/directories
find . -name "file.txt"   # Search in current directory

# Search in entire system (slow)
find / -name "file.txt"   # Searches from root

# Locate file quickly (needs database)
locate file.txt   # Fast search (run 'updatedb' first)

# Show manual of command
man ls   # Opens manual for ls command

# Short help
ls --help   # Quick help info

# ================================
# PRACTICE COMMANDS
# ================================

# Create directory and navigate into it
mkdir test_dir && cd test_dir   # Create + move into folder

# Go back and remove directory
cd .. && rm -r test_dir   # Delete directory

# Create multiple folders
mkdir dir1 dir2 dir3   # Create multiple directories

# Navigate step by step
cd dir1   # Enter dir1
cd ..     # Go back

# ================================
# END
# ================================
```

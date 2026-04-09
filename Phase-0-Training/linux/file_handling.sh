
#!/bin/bash

# ==========================================
# LINUX FILE VIEWING & EDITING COMMANDS
# ==========================================

# ----------- VIEW FILE CONTENT ------------

# Display entire file content
cat file.txt   # Prints full content to terminal

# Display with line numbers
cat -n file.txt   # Shows line numbers with content

# View file page by page (forward only)
more file.txt   # Press ENTER to scroll

# View file with scroll (up/down)
less file.txt   # Use arrow keys, press 'q' to exit

# Show first 10 lines
head file.txt   # Default shows top 10 lines

# Show first N lines
head -n 5 file.txt   # Shows first 5 lines

# Show last 10 lines
tail file.txt   # Default shows last 10 lines

# Show last N lines
tail -n 5 file.txt   # Shows last 5 lines

# Live monitoring (VERY IMPORTANT for logs)
tail -f file.txt   # Real-time updates (logs)

# ----------- CREATE FILES ------------

# Create empty file
touch file.txt   # Creates new file

# Create multiple files
touch file1.txt file2.txt   # Creates multiple files

# ----------- EDIT FILES ------------

# Edit file using nano (beginner friendly)
nano file.txt   # Open file editor

# Nano shortcuts:
# CTRL + O → Save
# CTRL + X → Exit

# Edit file using vim (advanced)
vim file.txt   # Open in vim editor

# Vim basics:
# i → Insert mode
# ESC → Exit insert mode
# :w → Save
# :q → Quit
# :wq → Save & quit

# ----------- WRITE CONTENT ------------

# Overwrite file content
echo "Hello Linux" > file.txt   # Replaces file content

# Append content to file
echo "New Line" >> file.txt   # Adds content at end

# ----------- COPY CONTENT ------------

# Copy file
cp file.txt backup.txt   # Copies file

# Copy with confirmation
cp -i file.txt backup.txt   # Ask before overwrite

# ----------- MOVE / RENAME ------------

# Rename file
mv old.txt new.txt   # Renames file

# Move file to another directory
mv file.txt /home/user/   # Moves file

# ----------- DELETE FILES ------------

# Delete file
rm file.txt   # Removes file

# Force delete
rm -f file.txt   # Deletes without confirmation

# Delete multiple files
rm file1.txt file2.txt   # Removes multiple files

# ----------- SEARCH INSIDE FILE ------------

# Search word in file
grep "hello" file.txt   # Finds matching lines

# Case-insensitive search
grep -i "hello" file.txt   # Ignores case

# Show line numbers with match
grep -n "hello" file.txt   # Shows line numbers

# ----------- FILE INFO ------------

# Show file type
file file.txt   # Displays file type

# Show file size
ls -lh file.txt   # Human-readable size

# Show file stats
stat file.txt   # Detailed file info

# ==========================================
# PRACTICE TASKS
# ==========================================

# 1. Create a file and write content
echo "Linux Practice" > test.txt

# 2. Append new line
echo "Second Line" >> test.txt

# 3. View content using less
less test.txt

# 4. Show last 2 lines
tail -n 2 test.txt

# 5. Search word "Linux"
grep "Linux" test.txt

# ==========================================
# END
# ==========================================
```

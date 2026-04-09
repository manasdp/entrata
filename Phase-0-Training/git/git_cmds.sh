
#!/bin/bash

# ==========================================
# GIT IMPORTANT COMMANDS (CHEAT SHEET)
# ==========================================

# ----------- CONFIGURATION ------------

git config --global user.name "Your Name"   # Set username
git config --global user.email "you@example.com"   # Set email

git config --list   # Show all config

# ----------- INITIALIZATION ------------

git init   # Initialize new Git repository

# Clone existing repo
git clone <repo_url>   # Copy repo from GitHub

# ----------- STATUS & TRACKING ------------

git status   # Show current status

git add file.txt   # Add single file
git add .          # Add all files

git restore file.txt   # Discard changes (unstaged)

# ----------- COMMIT ------------

git commit -m "Initial commit"   # Save changes

# Add + commit shortcut
git commit -am "Updated code"   # Only tracked files

# ----------- LOG ------------

git log   # Show commit history

git log --oneline   # Short log

git log --graph --oneline --all   # Visual graph

# ----------- BRANCHING ------------

git branch   # List branches

git branch new-branch   # Create branch

git checkout new-branch   # Switch branch

# Modern way
git switch new-branch   # Switch branch

# Create + switch
git checkout -b feature   # Create and move

# Delete branch
git branch -d feature   # Delete branch

# ----------- MERGING ------------

git checkout main   # Switch to main

git merge feature   # Merge feature into main

# ----------- REMOTE REPO ------------

git remote add origin <repo_url>   # Add remote repo

git remote -v   # Show remote URLs

# Push code
git push origin main   # Push to GitHub

# First time push
git push -u origin main   # Set upstream

# Pull latest code
git pull origin main   # Fetch + merge

# Fetch only
git fetch origin   # Download changes

# ----------- RESET & UNDO ------------

# Undo last commit (keep changes)
git reset --soft HEAD~1

# Undo commit (remove changes)
git reset --hard HEAD~1

# Undo staged file
git reset file.txt

# ----------- STASH ------------

git stash   # Save changes temporarily

git stash list   # Show stashes

git stash apply   # Apply last stash

git stash drop    # Delete stash

# ----------- DIFF ------------

git diff   # Show changes

git diff --staged   # Show staged changes

# ----------- TAGS ------------

git tag v1.0   # Create tag

git tag   # List tags

git push origin v1.0   # Push tag

# ----------- REMOVE FILE ------------

git rm file.txt   # Remove file

git rm --cached file.txt   # Remove from git but keep locally

# ----------- IGNORE FILES ------------

# Create .gitignore file
touch .gitignore

# Example:
# node_modules/
# *.log
# .env

# ----------- REBASE (ADVANCED) ------------

git rebase main   # Rebase current branch

# ----------- CHERRY PICK ------------

git cherry-pick <commit_id>   # Apply specific commit

# ----------- SUBMODULE ------------

git submodule add <repo_url>   # Add submodule

# ----------- CLEAN ------------

git clean -f   # Remove untracked files

# ----------- PRACTICE WORKFLOW ------------

# Step 1: Initialize repo
git init

# Step 2: Add files
git add .

# Step 3: Commit
git commit -m "First commit"

# Step 4: Connect GitHub
git remote add origin <repo_url>

# Step 5: Push
git push -u origin main

# ==========================================
# END OF FILE
# ==========================================
```

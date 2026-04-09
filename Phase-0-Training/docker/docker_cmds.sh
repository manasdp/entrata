
#!/bin/bash

# ==========================================
# DOCKER BASIC COMMANDS
# ==========================================

# ----------- DOCKER INFO ------------

docker --version   # Show docker version

docker info   # Detailed docker info

# ----------- IMAGES ------------

docker images   # List all images

# Pull image from Docker Hub
docker pull nginx   # Download nginx image

# Remove image
docker rmi nginx   # Delete image

# ----------- CONTAINERS ------------

# Run container
docker run nginx   # Run container

# Run in detached mode
docker run -d nginx   # Run in background

# Run with port mapping
docker run -d -p 8080:80 nginx   # Map port 8080 → 80

# List running containers
docker ps   # Active containers

# List all containers
docker ps -a   # Includes stopped

# Stop container
docker stop <container_id>

# Start container
docker start <container_id>

# Restart container
docker restart <container_id>

# Remove container
docker rm <container_id>

# Force remove
docker rm -f <container_id>

# ----------- EXECUTE COMMAND ------------

# Run command inside container
docker exec -it <container_id> bash   # Open terminal

# ----------- LOGS ------------

docker logs <container_id>   # View logs

# Live logs
docker logs -f <container_id>

# ----------- BUILD IMAGE ------------

# Build image from Dockerfile
docker build -t myapp .

# ----------- RUN CUSTOM IMAGE ------------

docker run -d -p 3000:3000 myapp

# ----------- CLEANUP ------------

# Remove all stopped containers
docker container prune

# Remove unused images
docker image prune

# ==========================================
# PRACTICE WORKFLOW
# ==========================================

# 1. Pull nginx
docker pull nginx

# 2. Run container
docker run -d -p 8080:80 nginx

# 3. Check running
docker ps

# 4. Stop container
docker stop <container_id>

# ==========================================
# END
# ==========================================
```

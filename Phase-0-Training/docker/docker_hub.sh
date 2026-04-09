
#!/bin/bash

# ==========================================
# DOCKER REGISTRY & DOCKER HUB COMMANDS
# ==========================================

# ----------- LOGIN ------------

docker login   # Login to Docker Hub

# ----------- SEARCH IMAGE ------------

docker search nginx   # Search images

# ----------- PULL IMAGE ------------

docker pull nginx   # Download image

# ----------- TAG IMAGE ------------

# Format: username/repository:tag
docker tag myapp username/myapp:latest

# ----------- PUSH IMAGE ------------

docker push username/myapp:latest   # Upload image

# ----------- LOGOUT ------------

docker logout   # Logout from Docker Hub

# ----------- REMOVE IMAGE ------------

docker rmi username/myapp:latest


```

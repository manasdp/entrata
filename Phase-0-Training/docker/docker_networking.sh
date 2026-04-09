
#!/bin/bash

# ==========================================
# DOCKER NETWORKING COMMANDS
# ==========================================

# List networks
docker network ls

# Inspect network
docker network inspect bridge

# Create custom network
docker network create my_network

# Run container in network
docker run -d --name container1 --network my_network nginx

docker run -d --name container2 --network my_network nginx

# Connect container to network
docker network connect my_network container1

# Disconnect container
docker network disconnect my_network container1

# Remove network
docker network rm my_network

```

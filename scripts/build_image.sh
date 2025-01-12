#!/bin/bash

TAG=$1
if [ -z "$TAG" ]; then
    echo "Please provide a tag for the Docker image"
    exit 1
fi

DOCKERFILE_PATH="./configuration/Dockerfile"

IMAGE_NAME="mrktosiek/geekup-prestashop:$TAG"

# Build the Docker image
(
    cd ..
    docker build -t $IMAGE_NAME -f $DOCKERFILE_PATH .
)
# Check if the build was successful
if [ $? -eq 0 ]; then
    echo "Docker image built successfully: $IMAGE_NAME"
else
    echo "Failed to build Docker image"
    exit 1
fi
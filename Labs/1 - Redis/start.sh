# Delete old versions
docker stop lab1
docker rm lab1

# Run
docker run -d --name lab1 -v ./redis-data:/data -p 6379:6379 redis

# Interactive CLI
# docker run -it --rm --network container:lab1 redis redis-cli

# Kill old port
kill -9 $(lsof -ti:8080)

# Run web server
php -S localhost:8080
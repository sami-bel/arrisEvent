up:
	DOCKER_UID=$(UID) docker-compose up -d
ssh:
	docker exec  -it php8_local /bin/bash
stop:
	docker-compose stop
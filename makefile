SHELL = /bin/sh

USER := $(shell id -u):$(shell id -g)
PWD := $(shell pwd)

define command =
	docker run --rm \
		$(2) \
		-u ${USER} \
		-v ${PWD}:/app -w /app \
		php:8.4-alpine \
		sh -c ${1}
endef

init:
	$(call command,"php ./composer.phar install")

rector-test: init
	$(call command,"php ./vendors/bin/rector process --dry-run")

rector: init
	$(call command, "php ./vendors/bin/rector process")

shell:
	$(call command, "sh",-it)

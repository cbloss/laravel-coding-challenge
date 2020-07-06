# Introduction

Feel free to ask any questions, we want you to succeed :smile: :heart: Coming to the challenge, one of the services we offer brands is video transcription. This is done from a third party service via API. We send them a video and when the transcription is ready, they send the transcription to us over a webhook in JSON. What we want you to build is as follows:

- Add an api endpoint/route that will receive the incoming webhook and its JSON payload.
- Code for the parsing and storing of that transcription data.

## What are we looking for

We want to see how you consume & model the data in Laravel. That means, what models, tables & relationships you create and use. How you parse, create & store the transcription data received. You might want to try and make the entire process as efficient & scalable as possible.

## Setup Details

- This is a fresh Laravel v7 install. Nothing changed other than this readme file.
- You can clone this repo locally & setup your `.env` file.
- `composer install` & `php artisan key:generate` to get it up and running.
- Create a branch and send in your code/changes as a Pull Request.
- Have added the example transcription file in the project root [here](https://github.com/JoggApp/laravel-coding-challenge/blob/master/transcription.json). Assume this is the incoming transcription webhook payload.
- We try to push forward and use the latest versions available. Our production API is already running Laravel v7 and PHP v7.4, so feel free to use PHP v7.4

## Terms in the transcription explained

- `Speakers`: All the speakers in the video
- `Monologues`: Each monologue corresponds to a run of text from one speaker.
- `Elements`: The actual transcribed words spoken and the grammer & punctuations in between them.
- The timestamp format of the `elements` is `hh:mm:sss,fff` where `fff` represents milliseconds.

Happy Coding! :)

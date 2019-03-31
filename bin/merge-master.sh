#!/usr/bin/env bash

branch_name=$(git symbolic-ref -q HEAD)
branch_name=${branch_name##refs/heads/}
branch_name=${branch_name:-HEAD}

git checkout master
git merge "$branch_name"
git push
git checkout "$branch_name"

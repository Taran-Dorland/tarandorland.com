import { Anchor, Avatar, Container, Flex, Text, Title, Tooltip } from '@mantine/core';
import { ReactNode } from 'react';

export interface ILinkItem {
	title: string;
	link: string;
	icon: ReactNode;
}

interface IData {
	name: string;
	jobLocation: string;
	contactLinks: Array<ILinkItem>;
	date: string;
}

export function InnerData({ name, jobLocation, contactLinks, date }: IData) {
	const links = contactLinks.map((link, index) => (
		<Anchor key={index} href={link.link} target="_blank">
			<Tooltip withArrow position='bottom' label={link.title}>
				<Avatar alt={link.title} color="blue" radius="sm">
					{link.icon}
				</Avatar>
			</Tooltip>
		</Anchor>
	));

	return (
		<Flex mih={300} gap="md" justify="center" align="center" direction="column" wrap="wrap">
			<Container>
				<Title order={1}>{name}</Title>
			</Container>
			<Container>
				<Text align="center" fz="md">{`Software Engineer currently @ ${jobLocation}`}</Text>
			</Container>
			<Container>
				<Flex gap="xl" justify="center" align="center" direction="row" wrap="wrap">
					{links}
				</Flex>
			</Container>
			<Text align="center" fz="xs" color="dimmed">
				{date}
			</Text>
		</Flex>
	);
}

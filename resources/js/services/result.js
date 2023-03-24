import axios from 'axios';

export const getAllResults = async (filter) => {
  let query = '';

  if (filter) {
    query = '?' + Object.entries(filter)
      .map(([key, value]) => `${key}=${encodeURIComponent(value)}`)
      .join('&');
  }

  try {
    const {data: results} = await axios.get(`/api/v1/result${query}`);

    return results;
  } catch (error) {
    throw error;
  }
};
